# 環境

- PHP：`v8.2.7`
- Symfony：`v6.3.0`
- MySQL：`v8.0.33`

# 作成したもの

Symfony6を使用して作成した簡単なメモアプリ

※UIは全く考慮していないので見た目はよくないです🙇‍♂️

- **メモ一覧**：[https://127.0.0.1:8000/memo](https://127.0.0.1:8000/memo)
- **メモの作成**：[https://127.0.0.1:8000/memo/create](https://127.0.0.1:8000/memo/create)
- **メモを編集**：[https://127.0.0.1:8000/memo/{id}/edit](https://127.0.0.1:8000/memo/{id}/edit)
- **メモを削除**：[https://127.0.0.1:8000/memo/{id}/delete](https://127.0.0.1:8000/memo/{id}/delete)

※`{id}`には作成したメモidを入れてください

![memo-app-symfony](https://github.com/mako5656/memo-app-symfony6/assets/45539499/d0cb131e-5a54-47e8-9aa7-adc70a9cd697)

# セットアップ

- リポジトリのcloneを行います。

```bash
$ git clone git@github.com:mako5656/memo-app-symfony6.git
```

- パッケージをインストールします。

※ Composerが入っていない場合はこちらの[ドキュメント](https://getcomposer.org/download/)を確認ください。

```bash
$ composer install
```

- `.env`ファイルの設定を、ご自身の環境に合わせて変更してください

```dotenv
- DATABASE_URL="postgresql://root:dev@127.0.0.1:3306/app?serverVersion=15&charset=utf8"
+ DATABASE_URL="mysql://{ユーザー}:{パスワード}@127.0.0.1:3306/db_name?serverVersion=8.0&charset=utf8mb4"
```

- `.env`で指定した`db_name`のデータベースを作成するために、次のコマンドを実行します。

```bash
$ php bin/console doctrine:database:create
Created database `db_name` for connection named default
```

- 下記マイグレーションを実行して、memoテーブルをデータベースに作成します。

```bash
$ php bin/console doctrine:migrations:migrate
[notice] Migrating up to DoctrineMigrations\Version20230623031235
[notice] finished in 15.7ms, used 14M memory, 1 migrations executed, 1 sql queries
 [OK] Successfully migrated to version : DoctrineMigrations\Version20230623031235
```

- Symfonyを動かすためにSymfony CLIをインストールする。

※[公式ドキュメント](https://symfony.com/download)の記載にある通り`wget`または経由`curl`経由でインストールします。

```bash
// wget経由
$ wget https://get.symfony.com/cli/installer -O - | bash
```
```bash
// curl経由
$ curl -sS https://get.symfony.com/cli/installer | bash
```

- Webサーバ起動
```bash
$ symfony server:start
```
