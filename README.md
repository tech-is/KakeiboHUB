# KakeiboHUB

## KakeiboHUBとは
家計簿で、他人とつながることができるウェブアプリです。

## ダウンロード方法
GitHubからダウンロードするか、```git clone```してください。

ダウンロード先
https://github.com/tech-is/KakeiboHUB

git cloneする場合
```
git clone https://github.com/tech-is/KakeiboHUB.git
```
## 主な機能
```
家計簿を作成し、それを他人が観覧できるもの。
```

## 環境構築
```
・apache  
・PHP 7.3.12  
・MYSQL 10.4.10-MariaDB   
・Codeigniter 3.1.11  
```

## データベースの設定
以下のコマンドを実行してdatabase.phpを作成してください
```
    $ cp application/config/database.php.sample application\config\database.php
```
/application/config/database.phpの以下の部分を修正してください。

| パラメータ名 | 指定値 | 例 |
| :---: | :---: | :---: |
| hostname | データベースサーバのホスト名 | localhostなど |
| username | データベースに接続するために使用するユーザ名 | rootなど |
| password | データベースに接続するために使用するパスワード | ****** |
| database | 接続したいデータベース名 | boardなど |


## フォルダ構成
```
・application/  
    ・config/ デフォルトコントローラーの設定やデータベースの設定ファイルを置いています  
    ・controler/ コントローラーのフォルダ  
    ・model/ データベース周りの関数をまとめたクラスを置いているフォルダ  
    ・views/ フロントエンドファイルをまとめたフォルダ  
・system/ ライブラリやヘルパーを置いているフォルダ  
・assets/ 静的ファイルをおいているフォルダ  
・index.php 最初にこのファイルを読み込んでください  
```