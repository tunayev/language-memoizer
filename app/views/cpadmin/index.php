<?php require APPROOT.'/views/inc/header.php'?>
<?php require APPROOT.'/views/inc/adminsidebar.php'?>
<div class="col-md-9">
<h1><?= $data['title'];?></h1>
<p><?= $data['description'];?></p>

<form action="#">
  <p>
    <input type="radio" id="test1" name="radio-group" checked>
    <label for="test1">Apple</label>
  </p>
  <p>
    <input type="radio" id="test2" name="radio-group">
    <label for="test2">Peach</label>
  </p>
  <p>
    <input type="radio" id="test3" name="radio-group">
    <label for="test3">Orange</label>
  </p>
</form>
        	<!-- <div class="section over-hide z-bigger">
            <div class="row justify-content-center pb-5">
              <div class="col-12 pt-5">
                <p class="mb-4 pb-2">Design Tools</p>
              </div>
              <div class="col-12 pb-5">
                <input class="checkbox-booking" type="radio" name="booking" id="booking-1">
                <label class="for-checkbox-booking" for="booking-1">
                <i class='uil uil-coffee mr-3'></i><span class="text">breakfast</span>
                </label>
                <input class="checkbox-booking" type="radio" name="booking" id="booking-2">
                <label class="for-checkbox-booking" for="booking-2">
                <i class='uil uil-restaurant mr-3'></i><span class="text">dinner</span>
                </label>
              </div>
            </div>
				  </div> -->
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <div class="d-flex accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            <div class="col-lg-3">
                WORT
            </div>
            <div class="col-lg-8">
                MEANING
            </div>
          </div>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">

        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          Accordion Item #2
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
      </div>
    </div>
  </div>
</div>
<?= 'Version: '.APP_VERSION;?>
<?php require APPROOT.'/views/inc/footer.php'?>
