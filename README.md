# AHsearch

PHP自作

## 概要

動物病院を検索できるアプリを作成しました。

病院の検索は病院名、住所から検索できるようになっています。

動物病院ユーザとペットオーナーユーザに分け、それぞれでログインできるようにしています。

ペットオーナーは自分のペットの情報を入力することによってうちの子カルテを作成できそれをPDFで出力できるようになっています。
## 使い方

ペットオーナーユーザ

動物病院の検索、会員情報の変更、うちの子カルテの作成・更新・削除、うちの子カルテのPDF出力ができます。

テストアカウント：

メールアドレス→test_po@test.com

パスワード→Test1234

動物病院ユーザ

動物病院の検索、会員情報の変更、病院情報の作成・更新・削除ができます。

テストアカウント：

メールアドレス→test_ah@test.com

パスワード→Test1234

管理ユーザ

動物病院の検索、会員情報・病院情報・ペット情報・お問い合わせ情報を確認・更新・削除できます。

テストアカウント：

メールアドレス→test_kanri@test.com

パスワード→Test1234

## 環境

XAMPP/MySQL/PHP8.1/Laravel10

## データベース

データベース名：ahearch

テーブル

お使いのphpMyAdminに上のデータベースを作り、入っているDB.sqlをインポートしていただければお使いいただけるようになると思います。