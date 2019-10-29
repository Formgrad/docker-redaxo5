setup: false
debug: false
instname: rex20160912113553
server: 'http<?= getenv('LETSENCRYPT_HOST') ? 's' : '' ?>://<?= explode(',', getenv('VIRTUAL_HOST'))[0] ?>/'
servername: Vedacon
error_email: <?= getenv('ERROR_EMAIL'), PHP_EOL ?>
fileperm: '0664'
dirperm: '0775'
session_duration: 7200
lang: de_de
use_gzip: true
use_etag: true
use_last_modified: false
start_page: structure
timezone: Europe/Berlin
socket_proxy: null
setup_addons:
    - backup
    - be_style
system_addons:
    - backup
    - mediapool
    - structure
    - metainfo
    - be_style
    - media_manager
    - users
    - install
    - project
table_prefix: rex_
temp_prefix: tmp_
db:
    1:
        host: db
        login: root
        password: <?= getenv('DB_ENV_MYSQL_ROOT_PASSWORD'), PHP_EOL ?>
        name: <?= getenv('DB_ENV_MYSQL_DATABASE'), PHP_EOL ?>
        persistent: false
    2:
        host: ''
        login: ''
        password: ''
        name: ''
        persistent: false
use_accesskeys: true
accesskeys:
    save: s
    apply: x
    delete: d
    add: a
    add_2: 'y'
