<?= include '../App/Views/components/header.php'; ?>
<main>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item" aria-current="customers"><a href="/customer">Customers</a></li>
            <li class="breadcrumb-item active" aria-current="form">Form</li>
          </ol>
        </nav>
      </div>      
    </div>

    <div class="col-8 offset-2" style="margin-top: 50px;">
      <h3>CREATE a customer is simple as that:</h3>
      <p>Fill some fields, submit it and that's it.</p>
    </div>

    <div class="row">
      <div class="col-8 offset-2">
        <form method="post" action="/customer/form">
          <div class="form-group">
            
            <?php if (isset($data['customer']['id'])): ?>
              <input type="hidden" class="form-control" id="id" name="id" value="<?= (isset($data['customer']['name'])) ? $data['customer']['id'] : ''; ?>">              
            <?php endif ?>

            <label for="name">Full name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="namelHelp" placeholder="We want to know you, let's start by your name" required="" value="<?= (isset($data['customer']['name'])) ? $data['customer']['name'] : ''; ?>">
            <small id="name" class="form-text text-muted">Your full name, don't by shy</small>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="A real e-mail, please. How we'll tell you the news if you lie about it?" required="" value="<?= (isset($data['customer']['email'])) ? $data['customer']['email'] : ''; ?>">
            <small id="email" class="form-text text-muted">A real e-mail, please. How we'll tell you the news if you lie about it?</small>
          </div>
          <div class="form-group">
            <label for="document">Document</label>
            <input type="text" class="form-control" id="document" name="document" maxlength="11" aria-describedby="documentHelp" placeholder="XXX.XXX.XXX-XX" required="" value="<?= (isset($data['customer']['document'])) ? $data['customer']['document'] : ''; ?>" <?= (isset($data['customer']['id'])) ? 'disabled=""' : ''; ?>>
            <small id="document" class="form-text text-muted">We don't make the rules, that's part of the proccess</small>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="(XX) XXXXX-XXXX" value="<?= (isset($data['customer']['phone'])) ? $data['customer']['phone'] : ''; ?>">
            <small id="phone" class="form-text text-muted">We promisse we won't call unless it's really important!</small>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
          <a class="btn btn-warning" href="/customer">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</main>
