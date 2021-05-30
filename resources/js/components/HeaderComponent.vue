<template>
	<!-- header section start -->
	<div class="header_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-3">
					<div class="logo"><a href="../assets/images/index.html"><img src="../assets/images/logo.png"></a></div>
				</div>
				<div class="col-sm-6">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
     						<router-link to="/" class="nav-item nav-link"> Home </router-link>
							<router-link to="/about" class="nav-item nav-link"> About </router-link>
							<router-link to="/contact" class="nav-item nav-link"> Contact </router-link>
                            
						   <!-- <a class="nav-item nav-link" href="index.html">Home</a>
                           <a class="nav-item nav-link" href="about.html">About</a>
                           <a class="nav-item nav-link" href="contact.html">Contact</a> -->
                        </div>
                    </div>
                    </nav>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="search_main">
                    <button class="submit_bt"><router-link to="/login" class="nav-item nav-link"> Login </router-link></button>
				    </div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

export default {
    name:'Header'
}
</script>




