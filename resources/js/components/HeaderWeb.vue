<template>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="p-0 me-4" href="/">
                    <img class="header_img" src="https://tinypic.host/images/2022/10/14/Logo_sm.png" alt="BoolBnB">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto w-100 align-items-center align-items-middle">
                        <li class="nav-item active fw-bold">
                            <router-link class="nav-link" to="/">
                                Home
                            </router-link>
                        </li>

                        <li class="nav-item ms-auto fw-bold">
                            <a href="/host" class="nav-link">
                                Login
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'HeaderWeb',
}
</script>

<style lang="scss" scoped>

</style>