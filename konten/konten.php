
  <?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		/* |==========================================================| */
		/* |====================| navigasi index |====================| */
		/* |==========================================================| */ 
		switch ($page) {
			case 'home':
				include "home.php";
				break;

			/* |======================================================| */
			/* |====================| Buku index |====================| */
			/* |======================================================| */
			case 'buku':
				include "buku.php";

			case 'tambah_buku':
				include "tambah_buku.php";
				break;

			case 'edit_buku':
				include "edit_buku.php";
				break;

			/* |==========================================================| */
			/* |====================| Kategori index |====================| */
			/* |==========================================================| */
			case 'kategori':
				include "kategori.php";
				break;

			case 'tambah_kategori':
				include "tambah_kategori.php";
				break;

			case 'edit_kategori':
				include "edit_kategori.php";
				break;

			/* |=========================================================| */
			/* |====================| Penulis index |====================| */
			/* |=========================================================| */
			case 'penulis':
				include "penulis.php";
				break;

			case 'tambah_penulis':
				include "tambah_penulis.php";
				break;

			case 'edit_penulis':
				include "edit_penulis.php";
				break;

			/* |==========================================================| */
			/* |====================| Penerbit index |====================| */
			/* |==========================================================| */
			case 'penerbit':
				include "penerbit.php";
				break;

			case 'tambah_penerbit':
				include "tambah_penerbit.php";
				break;

			case 'edit_penerbit':
				include "edit_penerbit.php";
				break;

			/* |================================================================| */
			/* |====================| File Tidak Ditemukan |====================| */
			/* |================================================================| */	
			default:
				include "404.php";
				break;
		}
	}else{
		include "home.php";
	}
 
?>