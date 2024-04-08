    </div>
</div>
<?php if('/loginSystemVanillaPHP/index.php'==$_SERVER['REQUEST_URI'] OR '/loginSystemVanillaPHP/'==$_SERVER['REQUEST_URI']) ?>
    <script src="assets/js/custom.js"></script>

        <footer>
            <hr />
            <p>&copy; 2024. All rights reserved.</p>
        </footer>
    </body>
</html>
<?php
//Close connection
if(isset($con))
    $con->close();?>