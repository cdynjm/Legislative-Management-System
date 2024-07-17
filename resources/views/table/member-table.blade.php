<table class="table align-items-center mb-0" id="member-search-result">
    <thead>
    <tr>
        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7" width="5%">No.</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
        @if(Auth::user()->type == 1)  
        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
        @endif
    </tr>
    </thead>
    <tbody>
        @php
            $count = 1;
        @endphp
    @foreach ($sbmembers as $mem)
    <tr>
        <td class="text-center">
            {{ $count }}
        </td>
        <td
        
         memberid='{{ $mem->id }}'
         name='{{ $mem->name }}'
         birthdate='{{ $mem->birthdate }}'
         address='{{ $mem->address }}'
         civil_status='{{ $mem->civil_status }}'
         position='{{ $mem->position }}'
         gender='{{ $mem->gender }}'
         status='{{ $mem->status }}'
         from_year='{{ $mem->from_year }}'
         to_year='{{ $mem->to_year }}'
         photo='{{ $mem->photo }}'
         email='{{ $mem->User->email }}'
            
        >
        <div class="d-flex px-2 py-1">
            <div>
            <img src="{{ asset('/storage/photo/'.$mem->photo) }}" class="avatar avatar-sm me-3" alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
            <h6 class="mb-0 text-sm">{{ $mem->name }}</h6>

            @if($mem->position == 1)
                <p class="text-xs text-secondary mb-0">Mayor</p>
            @endif
            @if($mem->position == 2)
                <p class="text-xs text-secondary mb-0">Vice Mayor</p>
            @endif
            @if($mem->position == 3)
                <p class="text-xs text-secondary mb-0">SB Member</p>
            @endif
           
            </div>
        </div>
        </td>
        <td>
        <p class="text-xs font-weight-bold mb-0">{{ $mem->address }}</p>
        </td>
        <td class="align-middle text-center text-sm">
        @if($mem->status == 1)
            <span class="badge badge-sm bg-gradient-success">Active</span>
        @endif
        @if($mem->status == 0)
            <span class="badge badge-sm bg-gradient-danger">Inactive</span>
        @endif
        </td>
        @if(Auth::user()->type == 1)  
        <td class="text-center">
        <a href="#" id="edit-mem" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
            <i class="fas fa-user-edit text-secondary"></i>
        </a>
        <!--
        <a href="#" id="delete-mem" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Delete">
            <i class="cursor-pointer fas fa-trash text-secondary"></i>
        </a> -->
        </td>
        
        @endif
        @php
            $count += 1;
        @endphp
    </tr>
    @endforeach
    </tbody>
</table>