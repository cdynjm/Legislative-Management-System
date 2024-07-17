<table class="table align-items-center mb-0" id="suggestion-box-result">
    <thead>
        <tr>
            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                No.
            </th>
            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Name
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Suggestion
            </th>
        </tr>
    </thead>
    <tbody>
    @php $cnt = 1; @endphp
        @foreach($suggestions as $sug)
        <tr>
           <td class="text-center text-xs">{{ $cnt }}</td>
           <td class="text-wrap text-sm text-center">{{ $sug->name }}</td>
           <td class="text-wrap text-xs text-center">{{ $sug->suggestions }}</td>
        </tr>
        @php $cnt += 1; @endphp
        @endforeach
    </tbody>
</table>