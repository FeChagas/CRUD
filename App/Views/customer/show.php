<?= include '../App/Views/components/header.php'; ?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="customers"><a href="/customer">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="view">View</li>
          </ol>
        </nav>
      </div>      
    </div>
    <div class="row">
      <div class="col-10 offset-2" style="margin-top:50px">


            <?php foreach ($data['customer'] as $customer) { ?>
            <div class="row">
              <h3 class="ml-2">Some actions:</h3>
              <a class="btn btn-primary ml-2" href="/customer/form/<?= $customer['id'] ?>">Edit</a>
              <a class="btn btn-danger ml-2" href="/customer/delete/<?= $customer['id'] ?>">Delete</a>
            </div>
            <div class="row">
              <div class="col-4">
                <p class="display-4">Name:</p>
              </div>
              <div class="col-6">
                <p class="display-4"><?= $customer['name'] ?></p>
              </div>
              <div class="col-4">
                <p class="display-4">E-mail:</p>
              </div>
              <div class="col-6">
                 <p class="display-4"><?= $customer['email'] ?></p> 
              </div>
              <div class="col-4">
                <p class="display-4">Document:</p>
              </div>
              <div class="col-6">
                 <p class="display-4"><?= $customer['document'] ?></p> 
              </div>
              <div class="col-4">
                <p class="display-4">Phone:</p>
              </div>
              <div class="col-6">
                 <p class="display-4"><?= $customer['phone'] ?></p> 
              </div>

            </div>
            <?php }?>
          
      </div>
    </div>
  </div>
</main>
