<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        // Mendapatkan data keranjang belanja dari sesi atau database

        // Misalnya, jika Anda menggunakan sesi:
        $cartItems = session('cart', []);

        // Jika Anda menggunakan database, Anda dapat menyesuaikan kode untuk mengambil data dari tabel keranjang belanja

        // Menampilkan halaman keranjang belanja dengan data produk di keranjang
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request, $productId)
    {
        // Mendapatkan data produk berdasarkan ID
        $product = Product::find($productId);

        // Memvalidasi apakah produk ditemukan
        if (!$product) {
            return redirect()->back()->withErrors('Produk tidak ditemukan.');
        }

        // Menambahkan produk ke keranjang belanja
        $cartItems = session('cart', []);
        $cartItems[] = $product;
        session(['cart' => $cartItems]);

        return redirect()->route('cart.index')->withSuccess('Produk berhasil ditambahkan ke keranjang.');
    }

    public function removeFromCart(Request $request, $productId)
    {
        // Mendapatkan data produk berdasarkan ID
        $product = Product::find($productId);

        // Memvalidasi apakah produk ditemukan
        if (!$product) {
            return redirect()->back()->withErrors('Produk tidak ditemukan.');
        }

        // Menghapus produk dari keranjang belanja
        $cartItems = session('cart', []);

        // Cari indeks produk dalam keranjang belanja
        $index = array_search($product, $cartItems);

        // Jika produk ditemukan, hapus dari keranjang belanja
        if ($index !== false) {
            unset($cartItems[$index]);
            session(['cart' => $cartItems]);
        }

        return redirect()->route('cart.index')->withSuccess('Produk berhasil dihapus dari keranjang.');
    }

    public function clearCart(Request $request)
    {
        // Menghapus semua produk dari keranjang belanja
        session()->forget('cart');

        return redirect()->route('cart.index')->withSuccess('Keranjang belanja berhasil dikosongkan.');
    }
}
