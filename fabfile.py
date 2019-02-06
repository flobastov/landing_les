from fabric.api import run, env, task, cd, put
from fabric.colors import green
from fabric.contrib.project import upload_project


@task
def staging():
    env.hosts = 'palax.info'
    env.password = 'G2s2L5v8'
    env.user = 'les-brevno'
    env.php_path = '/opt/php71/bin/php'
    env.composer_path = '/usr/local/bin/composer'
    env.project_path = '/var/www/les-brevno/data/www/les-brevno.ru'
    env.git_branch = 'develop'
    env.environment = {
        'APP_ENV': 'prod',
        'APP_SECRET': '87d6933015aac93c2007407f1f271aa5',
        'DATABASE_URL': 'mysql://les-brevno:D8d2W6w0@localhost:3306/les-brevno_2019',
        'SITEMAP_HOST': '',
        'MAILER_DEFAULT_FROM': 'ifarmhaus@yandex.ru',
        'MAILER_DEFAULT_REPLY_TO': 'ip.shupletsov@yandex.ru'
    }


def symfony_cmd(cmd):
    run('%s bin/console %s --env=prod' % (env.php_path, cmd))


def composer_cmd(cmd):
    run('%s %s %s' % (env.php_path, env.composer_path, cmd))


def msg(input):
    print(green('#' * 40))
    print(green("# %s" % input))
    print(green('#' * 40))


def generate_env_string(env_dict):
    result = []
    for key, value in env_dict.items():
        result.append('%s="%s"' % (key, value))
    return "\n".join(result)


@task
def deploy():
    with cd(env.project_path):
        msg("Upload static")

        msg("Put env variables")
        run("echo '%s' > .env" % generate_env_string(env.environment))

        msg("Git pull")
        run('git checkout %s' % env.git_branch)
        run('git reset --hard HEAD')
        run('git pull origin %s' % env.git_branch)

        msg("Clear cache")
        run('rm -rf ./var/*')

        msg("Install vendors")
        composer_cmd('install --prefer-dist --no-dev -o')

        msg("Migrations")
        symfony_cmd('doctrine:migrations:migrate -q')

        msg("Fixtures")
        symfony_cmd('doctrine:fixtures:load -n')

        msg("Warmup cache")
        symfony_cmd('cache:warmup')

        msg("Assets installation")
        symfony_cmd('ckeditor:install --clear=skip')
        symfony_cmd('assets:install')

        msg("Optimize")
        composer_cmd('dump-autoload --optimize --no-dev --classmap-authoritative')
