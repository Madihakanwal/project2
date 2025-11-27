<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // orders -> users, customers, shipping_addresses, coupons
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'user_id') && !$this->foreignKeyExists('orders', 'user_id')) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (Schema::hasColumn('orders', 'customer_id') && !$this->foreignKeyExists('orders', 'customer_id')) {
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            }
            if (Schema::hasColumn('orders', 'shipping_address_id') && !$this->foreignKeyExists('orders', 'shipping_address_id')) {
                $table->foreign('shipping_address_id')->references('id')->on('shipping_addresses')->onDelete('set null');
            }
            if (Schema::hasColumn('orders', 'coupon_id') && !$this->foreignKeyExists('orders', 'coupon_id')) {
                $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
            }
        });

        // order_items -> orders, products, product_variants
        Schema::table('order_items', function (Blueprint $table) {
            if (Schema::hasColumn('order_items', 'order_id') && !$this->foreignKeyExists('order_items', 'order_id')) {
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            }
            if (Schema::hasColumn('order_items', 'product_id') && !$this->foreignKeyExists('order_items', 'product_id')) {
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }
            if (Schema::hasColumn('order_items', 'variant_id') && !$this->foreignKeyExists('order_items', 'variant_id')) {
                $table->foreign('variant_id')->references('id')->on('product_variants')->onDelete('set null');
            }
        });

        // payments -> orders
        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'order_id') && !$this->foreignKeyExists('payments', 'order_id')) {
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            }
        });

        // products -> categories, sub_categories
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'category_id') && !$this->foreignKeyExists('products', 'category_id')) {
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            }
            if (Schema::hasColumn('products', 'sub_category_id') && !$this->foreignKeyExists('products', 'sub_category_id')) {
                $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('set null');
            }
        });

        // product_images -> products
        Schema::table('product_images', function (Blueprint $table) {
            if (Schema::hasColumn('product_images', 'product_id') && !$this->foreignKeyExists('product_images', 'product_id')) {
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }
        });

        // product_variants -> products
        Schema::table('product_variants', function (Blueprint $table) {
            if (Schema::hasColumn('product_variants', 'product_id') && !$this->foreignKeyExists('product_variants', 'product_id')) {
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }
        });

        // reviews -> users, products
        Schema::table('reviews', function (Blueprint $table) {
            if (Schema::hasColumn('reviews', 'user_id') && !$this->foreignKeyExists('reviews', 'user_id')) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (Schema::hasColumn('reviews', 'product_id') && !$this->foreignKeyExists('reviews', 'product_id')) {
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }
        });

        // wishlists -> users, products
        Schema::table('wishlists', function (Blueprint $table) {
            if (Schema::hasColumn('wishlists', 'user_id') && !$this->foreignKeyExists('wishlists', 'user_id')) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (Schema::hasColumn('wishlists', 'product_id') && !$this->foreignKeyExists('wishlists', 'product_id')) {
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }
        });

        // carts -> users
        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'user_id') && !$this->foreignKeyExists('carts', 'user_id')) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
        });

        // cart_items -> carts, products, product_variants
        Schema::table('cart_items', function (Blueprint $table) {
            if (Schema::hasColumn('cart_items', 'cart_id') && !$this->foreignKeyExists('cart_items', 'cart_id')) {
                $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            }
            if (Schema::hasColumn('cart_items', 'product_id') && !$this->foreignKeyExists('cart_items', 'product_id')) {
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            }
            if (Schema::hasColumn('cart_items', 'variant_id') && !$this->foreignKeyExists('cart_items', 'variant_id')) {
                $table->foreign('variant_id')->references('id')->on('product_variants')->onDelete('set null');
            }
        });

        // shipping_addresses -> users, customers
        Schema::table('shipping_addresses', function (Blueprint $table) {
            if (Schema::hasColumn('shipping_addresses', 'user_id') && !$this->foreignKeyExists('shipping_addresses', 'user_id')) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            }
            if (Schema::hasColumn('shipping_addresses', 'customer_id') && !$this->foreignKeyExists('shipping_addresses', 'customer_id')) {
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
            }
        });

        // sub_categories -> categories
        Schema::table('sub_categories', function (Blueprint $table) {
            if (Schema::hasColumn('sub_categories', 'category_id') && !$this->foreignKeyExists('sub_categories', 'category_id')) {
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        $tables = [
            'orders' => ['user_id', 'customer_id', 'shipping_address_id', 'coupon_id'],
            'order_items' => ['order_id', 'product_id', 'variant_id'],
            'payments' => ['order_id'],
            'products' => ['category_id', 'sub_category_id'],
            'product_images' => ['product_id'],
            'product_variants' => ['product_id'],
            'reviews' => ['user_id', 'product_id'],
            'wishlists' => ['user_id', 'product_id'],
            'carts' => ['user_id'],
            'cart_items' => ['cart_id', 'product_id', 'variant_id'],
            'shipping_addresses' => ['user_id', 'customer_id'],
            'sub_categories' => ['category_id'],
        ];

        foreach ($tables as $table => $columns) {
            Schema::table($table, function (Blueprint $t) use ($columns) {
                foreach ($columns as $col) {
                    try {
                        $t->dropForeign([$col]);
                    } catch (\Throwable $e) {
                        // ignore
                    }
                }
            });
        }
    }

    protected function foreignKeyExists(string $table, string $column): bool
    {
        try {
            $connection = Schema::getConnection();
            $dbName = $connection->getDatabaseName();
            $result = $connection->selectOne(
                "SELECT CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND COLUMN_NAME = ? AND REFERENCED_TABLE_NAME IS NOT NULL",
                [$dbName, $table, $column]
            );
            return (bool) $result;
        } catch (\Throwable $e) {
            return false;
        }
    }
};
