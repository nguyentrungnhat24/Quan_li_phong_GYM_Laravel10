
<td class="text-right">
    <?php
    if (isset($_SESSION['cart'])) {
        echo $_SESSION['cart'];
    } else {
        echo "0"; // hoặc giá trị mặc định khác
    }
    ?>
</td>
