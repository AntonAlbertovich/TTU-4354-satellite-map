<?php
  require_once('header.php');
    echo <<< _ADMIN
    <h2>Admin Home</h2>
    <hr />
      <div class="row text-center">
        <div class="col-sm-5">
          <a class="btn btn-lg btn-outline-primary" href="board.php">View Messages</a>
        </div>
        <div class="col-sm-5">
          <a class="btn btn-lg btn-outline-primary" href="post-message.php">Post Message</a>
        </div>
      </div>
_ADMIN;
  }
