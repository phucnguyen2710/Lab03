<?php
require_once("./entities/product.class.php");
require_once("./entities/category.class.php");
if (isset($_POST["btnsubmit"])) {
	// lấy giá trị từ form collection
	$productName = $_POST["txtName"];
	$cateID = $_POST["txtCateID"];
	$price = $_POST["txtprice"];
	$quantity = $_POST["txtquantity"];
	$description = $_POST["txtdesc"];
	$picture = $_FILES["txtpic"];

	// khởi tạo đối tượng product
	$newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
	//var_dump($newProduct);

	// luu xuong CSDL
	$result = $newProduct->save();

	if (!$result) {
		// Truy van loi
		header("Location: add_product.php?failure");
	} else {
		header("Location: add_product.php?inserted");
	}
}
?>
<?php
include_once("header.php");
?>

<div class="container">
	<!-- Form sản phẩm -->
	<form method="post" enctype="multipart/form-data">
		<!-- Tên sản phẩm -->
		<div class="row">
			<h2>Thêm sản phẩm</h2>
			<div class="lbltitle">
				<label>Tên sản phẩm</label>
			</div>
			<div class="lblinput" class="form-group">
				<input type="text" class="form-control" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>">
			</div>
		</div>
		<!-- Mô tả sản phẩm -->
		<div class="row">
			<div class="lbltitle">
				<label>Mô tả sản phẩm</label>
			</div>
			<div class="lblinput">
				<textarea name="txtdesc" class="form-control" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : ""; ?>"></textarea>
			</div>
		</div>
		<!-- Số lượng sản phẩm -->
		<div class="row">
			<div class="lbltitle">
				<label>Số lượng sản phẩm</label>
			</div>
			<div class="lblinput">
				<input type="number" class="form-control" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : ""; ?>">
			</div>
		</div>
		<!-- Giá sản phẩm -->
		<div class="row">
			<div class="lbltitle">
				<label>Giá sản phẩm</label>
			</div>
			<div class="lblinput">
				<input type="number" class="form-control" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : ""; ?>">
			</div>
		</div>
		<!-- Loại sản phẩm -->
		<div class="row">
			<div class="lbltitle">
				<label>Chọn Loại sản phẩm</label>
			</div>
			<div class="lblinput">
				<select name="txtCateID" class="form-control">
					<option value="" selected>----Chọn loại máy----</option>
					<?php
					$cates = Category::list_category();
					foreach ($cates as $item) {
						echo "<option value = " . $item["CateID"] . ">" . $item["CategoryName"] . "</option>";
					}
					?>
				</select>
			</div>
		</div>
		<!-- Hình sản phẩm -->
		<div class="row">
			<div class="lbltitle">
				<label>Đường dẫn hình ảnh</label>
			</div>
			<div class="lblinput">
				<input type="file" id="txtpic" name="txtpic" accept=".PNG. .GIF, .JPG">
			</div>
		</div>
			<div style="float:right">
				<input type="submit" name="btnsubmit" class="btn btn-success" onclick="click1()" value="Thêm">
				<a href="./list_product.php" class="btn btn-primary">Danh sách sản phẩm</a>
				<a href="./index.php" class="btn btn-info">Quay lại</a>
			</div>	
		</div>
	</form>
</div>


<script>
	function click1()
	{
		alert("Thêm thành công")
	}
</script>
<?php
include_once("footer.php");
?>