<link rel="stylesheet" href="<?= ROOT ?>/public/css/user.css"></link>

<div class="createorder jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h1 class="display-4 font-weight-normal">Hi there!</h1>
    <p class="lead ml-1">Are you ready to ship some parcels?</p>
    <hr class="my-2 w-50 ml-1">
    <p class="lead mt-4 mb-0 ml-1">
        <a class="btn btn-lg" href="Jumbo action link" role="button">Create Order</a>
    </p>
</div>

<div class="myorders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="ml-2">My Orders</h3>
    <form class="form-inline mt-3">
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Tracking Number">
        <button type="submit" class="btn mb-2 text-white">Search</button>
     </form>
    <table class="table table-striped mt-3 w-100">
        <thead>
            <tr>
                <th scope="col">Tracking Number</th>
                <th scope="col">Recipient</th>
                <th scope="col">Parcel Name</th>
                <th scope="col">Cost</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>                
            <tr>
                <th scope="row"><a href="">146541</a></th>
                <td>Markkk kkk kk kkkkk kkkkk k kkkkk</td>
                <td>Otto oooo ooooooooo oooooooo ooooo</td>
                <td>@mdooooo ooooooo oooo ooo  oooo oooo</td>
                <td>yuguygy guygyug uyfuygfyu</td>
            </tr>
        </tbody>
    </table>
</div>