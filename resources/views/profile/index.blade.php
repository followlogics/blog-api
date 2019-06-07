<div class="" _vik>
    <div _vik class="card">
        <div _vik class="card-body">
        <img class="card-img-top img-thumbnail img-responsive" style="width:125px" _vik src="public/me.jpg" alt="User image">
            <h5 _vik class="card-title">User Info</h5>
            <p class="card-text" _vik> E-mail : {{$user["email"]}}</p>
            <p class="card-text" _vik> Name : {{$user["name"]}}</p>
            <p class="card-text" _vik> Join At : {{Vk::dformat($user["created_at"])}}</p>
        </div>
    </div>
</div>