<div class="container-form">
    <form action="">
        <input type="text" name="" id="">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    <form action="">
        <select name="sort" id="select-sort">
            <option value="new">Mới Nhất</option>
            <option value="">Cũ Nhất</option>
            <option value="">Tài Khoản Bị Vô Hiệu Hoá</option>
            <option value="">Tài Khoản Khả Dụng</option>
        </select>
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>
<?php if ($total_page > 1) { ?>
    <div class="page-number">

        <?php if ($current_page > 3) { ?>
            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=1">Trang đầu</a>
        <?php } ?>

        <?php if ($current_page > 1) { ?>
            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $current_page - 1 ?>"><i
                    class="fa-solid fa-backward-step"></i></a>
        <?php }
        ?>

        <?php for ($index = 1; $index <= $total_page; $index++) {
            if ($current_page == $index) { //thiết lập điều kiện là trang hiện tại đã được chọn thì không chứa liên kết?>

                <strong class="number-of-page">
                    <?= $index ?>
                </strong>

            <?php } else { //thiết lập điều kiện là trang chưa được chọn thì sẽ chứa liên kết
                if ($current_page == $total_page) { // Nếu là trang cuối thì hiện thêm 4 trang trước đó
                    if ($index > ($current_page - 5)) { ?>
                        <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                        </a>
                        <?php
                    }
                } else if ($current_page == 1) { // Nếu là trang đầu thì hiện thêm 4 trang sau đó
                    if ($index < ($current_page + 5)) { ?>
                            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                            </a>
                        <?php
                    }

                } else if ($current_page == 2) {
                    if ($index < ($current_page + 4)) { ?>
                                <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                </a>
                        <?php
                    }
                    ?>
                    <?php
                } else if ($current_page == $total_page - 1) {
                    if ($index > ($current_page - 4)) { ?>
                                    <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                            <?= $index ?>
                                    </a>
                        <?php
                    } ?>

                <?php } else if ($index > ($current_page - 3) && $index < ($current_page + 3)) { ?>
                                    <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $index ?>">
                        <?= $index ?>
                                    </a>
                <?php } ?>
            <?php }
        } ?>
        <?php if ($total_page > 1 && $current_page < $total_page) { ?>
            <a class="number-of-page" href="index.php?page=listaccounts&pageNumber=<?= $current_page + 1 ?>"><i
                    class="fa-solid fa-forward-step"></i></a>
        <?php } ?>
    </div>
<?php } ?>
<table class="table-account">
    <tr>
        <th style="width: 10%">Mã Đơn Hàng</th>
        <th style="width: 30%">Mã Người Dùng</th>
        <th style="width: 15%">Giá Trị Đơn Hàng</th>
        <th style="width: 15%">Thời Gian Mua Hàng</th>
        <th style="width: 10%">Tuỳ chọn</th>
    </tr>
    <?php

    foreach ($dataAccount as $key => $value) {
        extract($value) ?>
        <tr>
            <td>
                <?= $iduser ?>
            </td>
            <td>
                <?= $name ?>
            </td>
            <td>
                <?= $tel ?>
            </td>
            <td>
                <?= $tel ?>
            </td>
            <td class="edit">
                <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
    <?php }

    ?>

</table>