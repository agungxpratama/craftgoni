<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_All extends CI_Model{
    public function get($table)
    {
        return $this->db->get($table);
    }

    public function select($select, $from, $with, $order)
    {
        $this->db->select($select);
        $this->db->from($from);
        $this->db->order_by($with, $order);
        $this->db->limit(1);
        return $this->db->get();
    }

    public function select_distinct($select, $from)
    {
        $this->db->distinct();
        $this->db->select($select);
        $this->db->from($from);
        return $this->db->get();
    }

    public function view_where($table,$where)
    {
        return $this->db->get_where($table,$where);
    }

    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
    }

    public function empty($table)
    {
        $this->db->empty_table($table);
    }

    public function update($table,$where,$data)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function delete($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }

    public function join_invoice_bar($where)
    {
        $this->db->select('*');
        $this->db->from('db_cart');
        $this->db->join('barang', 'db_cart.id_barang = barang.id_barang');
        // $this->db->join('user', 'cart.id_user = user.id_user');
        $this->db->where($where);
        return $this->db->get();
    }

    public function join_cart_bar()
    {
        $this->db->select('*');
        $this->db->from('cart');
        $this->db->join('barang', 'cart.id_barang = barang.id_barang');
        // $this->db->join('user', 'cart.id_user = user.id_user');
        return $this->db->get();
    }

    public function join_invoice_checkout($where)
    {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('checkout', 'invoice.id_checkout = checkout.id_checkout');
        $this->db->where($where);
        // $this->db->join('user', 'cart.id_user = user.id_user');
        return $this->db->get();
    }

    function join_cart($from, $at)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'keranjang2.id_obat = obat.id_obat');
        return $this->db->get();
    }

    function join_wishlist($from, $at)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'wishlist.id_barang = barang.id_barang');
        return $this->db->get();
    }

    public function join_transaksi($from, $at)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
        return $this->db->get();
    }

    public function join_transaksi_where($from, $at, $where)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
        $this->db->where($where);
        return $this->db->get();
    }

    public function join_detail_transaksi($from, $at, $where)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'pemesanan.id_pemesanan = transaksi.id_pemesanan', 'left');
        $this->db->where($where);
        return $this->db->get();
    }

    public function join_barang_stock()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('stock', 'stock.id_barang = barang.id_barang', 'left');
        return $this->db->get();
    }

    public function join_barang_stock_where($where)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('stock', 'stock.id_barang = barang.id_barang');
        $this->db->where($where);
        return $this->db->get();
    }

    function count($where)
    {
        return $this->db->count_all_results($where);
    }

    function count_like($where, $like)
    {
        $this->db->like('id_barang', $like);
        $this->db->from($where);
        return $this->db->count_all_results();
    }

    function count_like_finish($where, $like)
    {
        $this->db->like('status', $like);
        $this->db->from($where);
        return $this->db->count_all_results();
    }

    function count_like_stock($where, $like)
    {
        $this->db->like('status', $like);
        $this->db->from($where);
        return $this->db->count_all_results();
    }

    function count_like_stat($where, $like)
    {
        $this->db->like('id_barang', $like);
        $this->db->like('status', '1');
        $this->db->from($where);
        return $this->db->count_all_results();
    }

    function sum($kind, $table)
    {
        $this->db->select_sum($kind);
        $query = $this->db->get($table);

        return $query;
    }

    public function join_pemesanan()
    {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('checkout', 'invoice.id_checkout = checkout.id_checkout');
        $this->db->join('address', 'invoice.id_user = address.id_user');
        // $this->db->where($where);
        return $this->db->get();
    }

    public function join_where_pemesanan($where)
    {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('checkout', 'invoice.id_checkout = checkout.id_checkout');
        $this->db->join('address', 'invoice.id_user = address.id_user');
        $this->db->where($where);
        return $this->db->get();
    }

    public function join_favorite($at, $where)
    {
        $this->db->select('*');
        $this->db->from($at);
        $this->db->join('obat', 'favorite.id_obat = obat.id_obat');
        $this->db->where($where);
        return $this->db->get();
    }

    public function join_comment($at, $where)
    {
        $this->db->select('*');
        $this->db->from($at);
        $this->db->join('obat', 'favorite.id_obat = obat.id_obat');
        $this->db->where($where);
        return $this->db->get();
    }

    public function FunctionName()
    {
        # code...
    }

    public function join_buy_again($where)
    {
        $this->db->select('*');
		$this->db->from('transaksi');
		// $this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan');
		$this->db->join('keranjang', 'keranjang.id_pemesanan = transaksi.id_pemesanan');
		$this->db->where($where);
        return $this->db->get();
    }

    public function get_report()
    {
        $this->db->select('*');
        $this->db->from('report');
        $this->db->join('transaksi', 'transaksi.id_transaksi = report.id_transaksi');
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan');
        return $this->db->get();
    }
}
