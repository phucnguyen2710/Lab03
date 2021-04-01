<?php
require_once("./entities/product.class.php");
require_once("./entities/category.class.php");
?>
<?php
include_once("header.php");
if (!isset($_GET["cateid"])) {
    $prods = Product::list_product();
} else {
    $cateid = $_GET["cateid"];
    $prods = Product::list_product_by_cateid($cateid);
}
$cates = Category::list_category();
$prods = Product::list_product();
?>

<div class="container text-center">
    <h3>Danh sách sản phẩm</h3>
    <div class="row">
        <?php
        foreach ($prods as $item) {
        ?>
            <div class="col-sm-3">
                <div class="panel panel-primary">
                    <a> <img src="<?php echo "" . $item["Picture"]; ?>  " class="img-reponsive" style="width:210px; height:130px; padding-top:15px" alt="Image">
                        <p class="text-danger">Tên: <?php echo $item["ProductName"]; ?></p>
                    </a>


                    <p class="text-danger">Giá: <?php echo $item["Price"]; ?></p>
                    
                </div>

            </div>
        <?php } ?>
    </div>
    <!-- <div class="panel panel-primary">
    <h3 class="panel-heading">Danh mục</h3>
    <ul class="list-group">
        <?php
        foreach ($cates as $item) {
            echo "<li class='list-group-item'>
            <a href=./list_product.php?cateid=" . $item['CateID'] . ">" . $item['CategoryName'] . "</a>
            </li>";
        }
        ?>
    </ul> -->
    <div style="float:right">
        <a href="./add_product.php" class="btn btn-success">Thêm sản phẩm</a>
        <a href="./index.php" class="btn btn-info">Quay lại</a>
    </div>
        
</div>
</div>
<?php
include_once("footer.php"); ?>