<template>
    <div class="min-h-screen flex items-center justify-center h-full w-full bg-gray-400">
        <div class="max-w-xs">
            <div class="text-center mb-4">
                <span class="text-3xl font-bold">Admin Login</span>
            </div>
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="******************">
                    <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
                </div>
                <div class="mb-4">
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class=" w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {


    }
</script>

<style>

</style>
