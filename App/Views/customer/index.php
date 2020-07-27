<?= include '../App/Views/components/header.php'; ?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="customers">Customers</li>
            <li class="breadcrumb-item active" aria-current="list">List</li>
          </ol>
        </nav>
      </div>      
    </div>
    <div class="row">
      <div class="col-12" style="margin-top:50px">
        <div class="row">
          <div class="col-8">
            <h2>CUSTOMERS</h2>            
          </div>
          <div class="col-2">
            <a class="btn btn-block btn-primary" href="/customer/form">New</a>
          </div>
          <div class="col-2">
            <a class="btn btn-warning" href="/">Back</a>
          </div>

        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">FULL NAME</th>
              <th scope="col">E-MAIL</th>
              <th scope="col">DOCUMENT</th>
              <th scope="col">PHONE</th>
              <th scope="col" colspan="3">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['customers'] as $customer) { ?>
              <tr>
                <td><?= $customer['id'] ?></td>
                <td><?= $customer['name'] ?></td>
                <td><?= $customer['email'] ?></td>
                <td><?= $customer['document'] ?></td>
                <td><?= $customer['phone'] ?></td>
                <td><a class="btn btn-info" href="/customer/show/<?= $customer['id'] ?>">View</a></td>
                <td><a class="btn btn-primary" href="/customer/form/<?= $customer['id'] ?>">Edit</a></td>
                <td><a class="btn btn-danger" href="/customer/delete/<?= $customer['id'] ?>">Delete</a></td>
              </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
