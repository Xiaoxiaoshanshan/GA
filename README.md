*********************symfony****************

//建立新项目 最后是名字
composer create-project symfony/website-skeleton 【my-project】 

// 运行 PHP服务器
php bin/console server:run 

// 文件里设置数据库信息 .env 
# DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name //初始形式
DATABASE_URL=mysql://root:@127.0.0.1:3306/grandangle //实际例子

// php bin/console doctrine:database:create

//创建user migration 之前改 json 到 array
php bin/console make:user

/**
     * @ORM\Column(type="array")
     */
    private $roles = [];

//make:auth 选1？
 What style of authentication do you want? [Empty authenticator]:
  [0] Empty authenticator
  [1] Login form authenticator

  // upload

  entity enlever type string


// make fixtures + faker

// composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load

Enjoy =)

//uploads
1 creer dans src-service -fileuploader.php(function copy de symfony)
 problem symfony connais pas ,il faut reference dans symfony
 2 config-services.yaml

 musiccontroller- ajoute use app\service\uploader
 3 traitement de type

 music fonction get path suprimer type variable

  @Assert\File(mimeTypes = {"audio/mpeg"})

 4 afficher-template

 home -show-asset-asset

 5 controller

6 entity-user.php-role arrray
doccier-migration -role longtext

************musicrepository***********
1music repository
2 music controller -function index
3google : doctrine query language innerjoin

*********translator************
fason 1:
1 musictype
2formsfr
3config yaml 'fr'

fason 2:
dans twig
***********locale dynamique**********

php bin/console make:subcriber localelistener


******************email************

smtp

************fixture-faker-***************

