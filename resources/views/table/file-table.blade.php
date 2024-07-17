<table class="table align-items-center mb-0" id="file-search-result">
    <thead>
        <tr>
            <th width="8%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                No.
            </th>
            <th>

            </th>
            <th width="20%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                Ordinance Title
            </th>
            <th width="8%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Ordinance Number
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Author
            </th>
            <!--
            <th width="20%" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Readings
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Final Title
            </th> -->
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Municipal Status
            </th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Provincial Status
            </th>
            <th  class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
    @php $cnt = 1; @endphp
    @foreach ($files as $fil)
        
    @foreach ($coauthors as $co)
        @if($co->fileid == $fil->id)
            <input type="" class="file-coauthors-{{ $cnt }}" value="{{ $co->author }}" style="display: none;">
            <input type="" class="file-coauthors-name-{{ $cnt }}" value="{{ $co->Author->name }}" style="display: none;">
        @endif
    @endforeach

        <tr>
            <td class="ps-4"
            
              count="{{ $cnt }}"
              fileid="{{ $fil->id }}" 
              status="{{ $fil->status }}"
              status_pro="{{ $fil->status_sp }}"
              ordinance_title="{{ $fil->ordinance_title }}"
              author="{{ $fil->author }}" 
              co_author="{{ $fil->co_author }}" 
              first="{{ $fil->first }}" 
              second="{{ $fil->second }}" 
              third="{{ $fil->third }}" 
              ordinance_number="{{ $fil->ordinance_number }}" 
              final_title="{{ $fil->final_title }}" 
              enactment_date="{{ $fil->enactment_date }}" 
              lce_approval="{{ $fil->lce_approval }}" 
              transmittal="{{ $fil->transmittal }}" 
              sp_sl="{{ $fil->sp_sl }}" 
              posted="{{ $fil->posted }}" 
              published="{{ $fil->published }}" 
              status_implementation="{{ $fil->status_implementation }}" 
              filename="{{ $fil->id }}" 
              oldfile='{{ $fil->filename }}' 
            
            @if(!empty($fil->first))
                view_first="{{ date('F d, Y', strtotime($fil->first)) }}" 
            @endif
            @if(!empty($fil->second))
            view_second="{{ date('F d, Y', strtotime($fil->second)) }}" 
            @endif
            @if(!empty($fil->third))
                view_third="{{ date('F d, Y', strtotime($fil->third)) }}" 
            @endif
            @if(!empty($fil->enactment_date))
            view_enactment_date="{{ date('F d, Y', strtotime($fil->enactment_date)) }}" 
            @endif
            @if(!empty($fil->lce_approval))
                view_lce_approval="{{ date('F d, Y', strtotime($fil->lce_approval)) }}" 
            @endif
            @if(!empty($fil->posting_publications))
                view_posting_publications="{{ date('F d, Y', strtotime($fil->posting_publications)) }}" 
            @endif
            @if(!empty($fil->transmittal))
                view_transmittal="{{ date('F d, Y', strtotime($fil->transmittal)) }}" 
            @endif
            @if(!empty($fil->sp_sl))
                view_sp_sl="{{ date('F d, Y', strtotime($fil->sp_sl)) }}" 
            @endif
            
            
            >
                <p class="text-xs font-weight-bold mb-0">{{ $cnt }}</p>
            </td>
            <td class="text-start">
                <a href="{{ asset('storage/files/'.$fil->filename) }}" target="blank">
                    <p class="text-xs font-weight-bold mb-0">
                @if($fil->extension == 'pdf')
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                </svg>
                @endif
                @if($fil->extension == 'docx')
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-docx" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-6.839 9.688v-.522a1.54 1.54 0 0 0-.117-.641.861.861 0 0 0-.322-.387.862.862 0 0 0-.469-.129.868.868 0 0 0-.471.13.868.868 0 0 0-.32.386 1.54 1.54 0 0 0-.117.641v.522c0 .256.04.47.117.641a.868.868 0 0 0 .32.387.883.883 0 0 0 .471.126.877.877 0 0 0 .469-.126.861.861 0 0 0 .322-.386 1.55 1.55 0 0 0 .117-.642Zm.803-.516v.513c0 .375-.068.7-.205.973a1.47 1.47 0 0 1-.589.627c-.254.144-.56.216-.917.216a1.86 1.86 0 0 1-.92-.216 1.463 1.463 0 0 1-.589-.627 2.151 2.151 0 0 1-.205-.973v-.513c0-.379.069-.704.205-.975.137-.274.333-.483.59-.627.257-.147.564-.22.92-.22.357 0 .662.073.916.22.256.146.452.356.59.63.136.271.204.595.204.972ZM1 15.925v-3.999h1.459c.406 0 .741.078 1.005.235.264.156.46.382.589.68.13.296.196.655.196 1.074 0 .422-.065.784-.196 1.084-.131.301-.33.53-.595.689-.264.158-.597.237-.999.237H1Zm1.354-3.354H1.79v2.707h.563c.185 0 .346-.028.483-.082a.8.8 0 0 0 .334-.252c.088-.114.153-.254.196-.422a2.3 2.3 0 0 0 .068-.592c0-.3-.04-.552-.118-.753a.89.89 0 0 0-.354-.454c-.158-.102-.361-.152-.61-.152Zm6.756 1.116c0-.248.034-.46.103-.633a.868.868 0 0 1 .301-.398.814.814 0 0 1 .475-.138c.15 0 .283.032.398.097a.7.7 0 0 1 .273.26.85.85 0 0 1 .12.381h.765v-.073a1.33 1.33 0 0 0-.466-.964 1.44 1.44 0 0 0-.49-.272 1.836 1.836 0 0 0-.606-.097c-.355 0-.66.074-.911.223-.25.148-.44.359-.571.633-.131.273-.197.6-.197.978v.498c0 .379.065.704.194.976.13.271.321.48.571.627.25.144.555.216.914.216.293 0 .555-.054.785-.164.23-.11.414-.26.551-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.765a.8.8 0 0 1-.117.364.699.699 0 0 1-.273.248.874.874 0 0 1-.401.088.845.845 0 0 1-.478-.131.834.834 0 0 1-.298-.393 1.7 1.7 0 0 1-.103-.627v-.495Zm5.092-1.76h.894l-1.275 2.006 1.254 1.992h-.908l-.85-1.415h-.035l-.852 1.415h-.862l1.24-2.015-1.228-1.984h.932l.832 1.439h.035l.823-1.439Z"/>
                </svg>
                @endif
                @if($fil->extension == 'doc')
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-docx" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5Zm-6.839 9.688v-.522a1.54 1.54 0 0 0-.117-.641.861.861 0 0 0-.322-.387.862.862 0 0 0-.469-.129.868.868 0 0 0-.471.13.868.868 0 0 0-.32.386 1.54 1.54 0 0 0-.117.641v.522c0 .256.04.47.117.641a.868.868 0 0 0 .32.387.883.883 0 0 0 .471.126.877.877 0 0 0 .469-.126.861.861 0 0 0 .322-.386 1.55 1.55 0 0 0 .117-.642Zm.803-.516v.513c0 .375-.068.7-.205.973a1.47 1.47 0 0 1-.589.627c-.254.144-.56.216-.917.216a1.86 1.86 0 0 1-.92-.216 1.463 1.463 0 0 1-.589-.627 2.151 2.151 0 0 1-.205-.973v-.513c0-.379.069-.704.205-.975.137-.274.333-.483.59-.627.257-.147.564-.22.92-.22.357 0 .662.073.916.22.256.146.452.356.59.63.136.271.204.595.204.972ZM1 15.925v-3.999h1.459c.406 0 .741.078 1.005.235.264.156.46.382.589.68.13.296.196.655.196 1.074 0 .422-.065.784-.196 1.084-.131.301-.33.53-.595.689-.264.158-.597.237-.999.237H1Zm1.354-3.354H1.79v2.707h.563c.185 0 .346-.028.483-.082a.8.8 0 0 0 .334-.252c.088-.114.153-.254.196-.422a2.3 2.3 0 0 0 .068-.592c0-.3-.04-.552-.118-.753a.89.89 0 0 0-.354-.454c-.158-.102-.361-.152-.61-.152Zm6.756 1.116c0-.248.034-.46.103-.633a.868.868 0 0 1 .301-.398.814.814 0 0 1 .475-.138c.15 0 .283.032.398.097a.7.7 0 0 1 .273.26.85.85 0 0 1 .12.381h.765v-.073a1.33 1.33 0 0 0-.466-.964 1.44 1.44 0 0 0-.49-.272 1.836 1.836 0 0 0-.606-.097c-.355 0-.66.074-.911.223-.25.148-.44.359-.571.633-.131.273-.197.6-.197.978v.498c0 .379.065.704.194.976.13.271.321.48.571.627.25.144.555.216.914.216.293 0 .555-.054.785-.164.23-.11.414-.26.551-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.765a.8.8 0 0 1-.117.364.699.699 0 0 1-.273.248.874.874 0 0 1-.401.088.845.845 0 0 1-.478-.131.834.834 0 0 1-.298-.393 1.7 1.7 0 0 1-.103-.627v-.495Zm5.092-1.76h.894l-1.275 2.006 1.254 1.992h-.908l-.85-1.415h-.035l-.852 1.415h-.862l1.24-2.015-1.228-1.984h.932l.832 1.439h.035l.823-1.439Z"/>
                </svg>
                @endif
                @if($fil->extension == 'xlsx')
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                    <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                </svg>
                @endif
                @if($fil->extension == 'ppt')
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-ppt" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm2.817-1.333h-1.6v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474.108-.201.161-.427.161-.677 0-.25-.052-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.793.793 0 0 1-.375.082H4.15V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm2.767-.67v3.336H7.48v-3.337H6.346v-.662h3.065v.662H8.274Z"/>
                </svg>
                @endif
                @if($fil->extension == 'pptx')
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-pptx" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.5 11.85h1.6c.289 0 .533.06.732.179.201.117.355.276.46.477.105.201.158.427.158.677 0 .25-.054.476-.16.677-.106.199-.26.357-.464.474a1.452 1.452 0 0 1-.732.173H2.29v1.342H1.5V11.85Zm2.06 1.714a.795.795 0 0 0 .085-.381c0-.226-.062-.4-.185-.521-.123-.122-.294-.182-.513-.182h-.659v1.406h.66a.794.794 0 0 0 .374-.082.574.574 0 0 0 .238-.24Zm1.302-1.714h1.6c.289 0 .533.06.732.179.201.117.355.276.46.477.106.201.158.427.158.677 0 .25-.053.476-.16.677-.106.199-.26.357-.464.474a1.452 1.452 0 0 1-.732.173h-.803v1.342h-.79V11.85Zm2.06 1.714a.795.795 0 0 0 .085-.381c0-.226-.062-.4-.185-.521-.123-.122-.294-.182-.513-.182H5.65v1.406h.66a.793.793 0 0 0 .374-.082.574.574 0 0 0 .238-.24Zm2.852 2.285v-3.337h1.137v-.662H7.846v.662H8.98v3.337h.794Zm3.796-3.999h.893l-1.274 2.007 1.254 1.992h-.908l-.85-1.415h-.035l-.853 1.415h-.861l1.24-2.016-1.228-1.983h.931l.832 1.439h.035l.824-1.439Z"/>
                </svg>
                @endif
                </p>

                </a>
            </td>
            <td class="text-start">
                <p class="text-wrap text-xs font-weight-bold mb-0">{{ $fil->ordinance_title }}</p>
            </td>
            <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{ $fil->ordinance_number }}</p>
            </td>

            <td class="text-center">
                <p class="text-xs font-weight-bold mb-0">{{ $fil->Author->name }}</p>
            </td>
           <!--
            <td class="text-center">
                @if(!empty($fil->first))
                <p class="text-xs font-weight-bold mb-2">1st: <span class="ms-2">{{ date('M. d, Y', strtotime($fil->first)) }}</span></p>
                @endif
                @if(!empty($fil->second))
                <p class="text-xs font-weight-bold mb-2">2nd: <span class="ms-2">{{ date('M. d, Y', strtotime($fil->second)) }}</span></p>
                @endif
                @if(!empty($fil->third))
                <p class="text-xs font-weight-bold mb-2">3rd: <span class="ms-2">{{ date('M. d, Y', strtotime($fil->third)) }}</span></p>
                @endif
            </td>

            <td class="text-start text-wrap">
                <p class="text-xs font-weight-bold mb-0">{{ $fil->final_title }}</p>
            </td> -->

            <td class="text-center">
                @if($fil->status == 0)
                <p class="text-xs font-weight-bold mb-0 text-danger">Draft Ordinance</p>
                @endif
                @if($fil->status == 1)
                    <p class="text-xs font-weight-bold mb-0 text-success">Approved</p>
                @endif
            </td>

            <td class="text-center">
                @if($fil->status_sp == null)
                <p class="text-xs font-weight-bold mb-0 text-danger">-</p>
                @endif
                @if($fil->status_sp == 1)
                <p class="text-xs font-weight-bold mb-0 text-success">Approved</p>
                @endif
                @if($fil->status_sp == 2)
                    <p class="text-xs font-weight-bold mb-0 text-danger">Disapproved</p>
                @endif
            </td>

           
            <td class="text-center">
                <a href="#" id="view-file" class="me-2" data-bs-toggle="tooltip" data-bs-original-title="View">
                    <i class="fas fa-eye text-secondary"></i>
                </a>
                @if(Auth::user()->type == 1)
                <a href="#" id="edit-file" class="me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                    <i class="fas fa-user-edit text-secondary"></i>
                </a>
               
                <a href="#" id="delete-file" class="m" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                </a>
                
                @endif
            </td>
        </tr>                          
        @php $cnt += 1; @endphp
        @endforeach
        </tbody>
</table>