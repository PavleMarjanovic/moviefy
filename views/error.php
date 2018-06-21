<div class="faq">
    <div class="container">
        <div class="grid_3 grid_4 w3layouts">
            <h3 class="hdg">Access Denied</h3>
            <div class="bs-example">
                <table class="table">
                    <tbody>
                    <tr>
                        <?php if(isset($_SESSION['user'])) : ?>
                        <td><h1 id="h1.-bootstrap-heading">Only administrators can access this area.<a class="anchorjs-link" href="#h1.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h1></td>
                        <?php else : ?>
                        <td><h1 id="h1.-bootstrap-heading">You have to be logged in to see this content.<a class="anchorjs-link" href="#h1.-bootstrap-heading"><span class="anchorjs-icon"></span></a></h1></td>
                        <?php endif; ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>