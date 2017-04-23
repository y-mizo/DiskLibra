# DiskLibra

## 概要

個人視聴用に録画しているブルーレイディスクの管理のための試作。 
オフライン個人使用を想定、煩雑なコードあり、最低限の機能にとどまる。

## 想定ユーザ

* ブランクディスクはスピンドルケース50枚単位で購入することが多く、保管もスピンドルケースをそのまま使用する場合がある。（保管の安全性については下記の補足情報を参照。）
* 盤面プリントはしない（何が録画されているか見た目ではわからなくなる）
* 継続して録画しているお気に入りのテレビ番組がある

## 使用方法
 
盤面に5桁シリアル番号をスタンプしてデータベース化していく。  
ディスク規格が【 BD-R/BD-RE/BD-RE XL 】など混在していることもあるため、  
規格毎の分類はせず、ブルーレイディスクというくくりで付番していく。  

*******  

# 具体的な導入方法

## 要件
* PHP 5.6 以上
* MySQL 5 以上

## インストール方法
```
$ git clone https://github.com/y-mizo/DiskLibra.git
$ cd DiskLibra
$ composer install
```

## tmpディレクトリの作成
tmpディレクトリを下記構成で作る。
```
tmp
├── cache
│   ├── models
│   └── persistent
└── logs
    ├── debug.log
    └── error.log
```

## データベースのセットアップ
※ 事前に MySQL 内に空のデータベースを作成しておく。  
文字コードは UTF8 。

▼ database.php ファイルを作成
```
$ cp Config/database.php.default Config/database.php
```

▼ database.php ファイルを編集
```
<?php
// Config/database.php

class DATABASE_CONFIG {

	public $default = array(
		'datasource'  => 'Database/Mysql',
		'persistent'  => false,
		'host'        => 'YOUR_HOSTNAME',
		'login'       => 'YOUR_USERID',
		'password'    => 'YOUR_PASSWORD',
		'database'    => 'YOUR_DATABASE',
		'prefix'      => '',
		'encoding'    => 'utf8',
        // XAMPP の場合は以下をアクティブにする。
        // 'unix_socket' => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock',
	);
        ... 
        ...
}
```

▼ データベースのテーブルを作成(マイグレーションの実行)
```
$ Console/cake Migrations.migration run all
```
**※ 注意点**  
シリアル番号を「00001」のように「0」で埋めて付番するため、属性の設定を行う。  
マイグレーションファイルで指定する方法がわからなかったため、phpMyAdminから直接変更した。  
念のためSQL文は下記の通り。
```
ALTER TABLE `disks` CHANGE `id` `id` INT(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
```

## アプリケーションの起動
※ 事前に MySQL を起動しておく。
```
$ Console/cake server -p 8000
...
...
built-in server is running in http://YOUR_HOSTNAME:8000/
```

*******

## 補足情報
例としてVictor・JVCから発売されている、BD-REスピンドル版に封入の説明書き（ドーナツカード）には下記のように書かれている。スピンドルケースでの保管は検索性は悪いものの、保管方法の選択肢として差し支えないと考えられる。
>ご使用後は必ず**元のスピンドルケース**またはプラスチックケースなどに入れて保管してください。  
不織布ケースやファイルケースのような、軟質ケースでは保管しないでください。
