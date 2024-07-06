<?php
ob_start();
$sayfa='Wordpress Sitelerde Ara';
include('inc/vt.php');
include('inc/head.php');
include('inc/nav.php');
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
		  
            <div class="card-header pb-0">
			<div class="input-group">
			<form action="arama.php" method="POST">
  <div class="form-outline">
    <input type="search" id="ajaxSubmit" name="ara" class="form-control" />
   
  </div>

  <button type="submit" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>  </form>
              <h6>Wordpress Siteler</h6><a style="width:15%;  float: right; margin-left:auto;
      margin-right:auto;" class="btn btn-success btn-lg" role="button" href="siteekle.php">Worespress Site Ekle</a>
            </div>
			
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                   <tr>
					  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Başlık</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aktiflik</th>
				      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Eklenme Tarihi</th> 
					  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Düzenlenme Tarihi</th>  
				      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sıra</th>      
				      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ekleyen</th>   			
 <th class="text-secondary opacity-7"></th>					  
                    </tr>
                  </thead>
                   <tbody>
				  <?php
$sorgu = $baglanti->prepare("SELECT * FROM siteler WHERE platform='wordpress' order by id");
$sorgu->execute();

while ($sonuc = $sorgu->fetch()) { 
 ?>
 <tr>
					<td><?=$sonuc['id']?></td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
						  
                           <img src="<?=$sonuc['logo_url']?>" class="avatar avatar-sm me-3 aw-zoom" style="background-color:black;" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=stripslashes($sonuc['site'])?></h6>
                            <p class="text-xs text-secondary mb-0">Bülten Takibi</p>
                          </div>
                        </div>
                      </td>
                      <td>
					  <?php 
					  if ($sonuc['aktif'] == 1){
						  echo "<span class='badge badge-sm bg-gradient-success'>Aktif</span>";
					  }
					  else
						  
					  echo "<span class='badge badge-sm bg-gradient-secondary'>Pasif</span>";
					  
					  ?>
                        
                      </td>
					     <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$sonuc['createdate']?></p>
                      </td>
					     <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$sonuc['updatedate']?></p>
                      </td>
 <td class="text-xs font-weight-bold mb-0" ><?=$sonuc['sira']?></td>
   <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$sonuc['ekleyen']?></p>
                      </td>
  <td class="align-middle">
                       <div class="ms-auto text-end">
					    <a class="btn btn-link text-danger text-gradient px-3 mb-0 dropdown-item" data-toggle="modal" data-target="#sil<?= $sonuc["id"] ?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Sil</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="hakkimdaduzenle.php?id=<?=$sonuc['id']?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Düzenle</a>
                  </div>
				  	               <div class="modal fade" id="sil<?= $sonuc["id"] ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sil</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Hakkımda yazısını silmek istediğinizden emin misiniz?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary pull-left mx-4" type="button"
                                                            data-dismiss="modal">İptal
                                                    </button>
                                                    <a class="btn btn-danger pull-right mx-4"
                                                       href="hakkimdasil.php?id=<?=$sonuc['id']?>">Sil</a>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
				  
                      </td>
                    
                    </tr>
<?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
	  
	  
	  
	  
	  
	  
	  
	  
     

  <?php include('inc/footer.php'); ?>