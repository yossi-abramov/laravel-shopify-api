# Laravel + Shopify API

## Install dependencies via composer

```
composer install
```

## Set Laravel .env

1. Rename `.env.example` to `.env`
2. In `.env` set the following variables:

```
# Shopify
SHOPIFY_API_KEY=
SHOPIFY_API_PASSWORD=
SHOPIFY_SHOP_DOMAIN=
```

_Important:_ `SHOPIFY_SHOP_DOMAIN` should not have `http` or `https`.

3. Generate application encryption key

```
php artisan key:generate
```

4. Create a `database/database.sqlite` file.

5. Run migrations and seed the database with:

```
php artisan migrate --seed
```

6. Run Laravel's local dev serve:

```
php artisan serve
```

## Routes

/orders => fetch all orders

/orders/{order_id} => fetch order items by order id
