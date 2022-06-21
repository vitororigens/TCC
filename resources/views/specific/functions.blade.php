<?php 

function formatPrice($preco) {
    return "R$ " . number_format($preco, 2, ',','.');
}