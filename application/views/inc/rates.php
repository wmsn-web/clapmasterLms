<style type="text/css">
	.orange{ color: #FFA600 }
	.gray { color: #D9D9D9 }
</style>
<?php
$rates = $coment['rates'];
if($rates == 0)
{
	echo "
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
	";
}
elseif($rates == 1)
{
	echo "
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
	";
}
elseif($rates == 2)
{
	echo "
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
	";
}
elseif($rates == 3)
{
	echo "
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star gray'></i>
		<i class='fas fa-star gray'></i>
	";
}
elseif($rates == 4)
{
	echo "
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star gray'></i>
	";
}
elseif($rates == 5)
{
	echo "
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
		<i class='fas fa-star orange'></i>
	";
}
else
{
	echo "";
}

?>