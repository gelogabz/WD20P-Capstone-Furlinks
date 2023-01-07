<div class="border" style="border-radius:20px;padding:20px;background-color:rgb(241, 241, 241)">
  <h5 style="text-align: center">Dog Applications</h5>
  <table class="striped" style="width:100%;margin-top:10px">
    <tr style="border-bottom:0.3pt solid #e1e1e1;">
      <th>Username</th>
      <th>Date Submitted</th>
      <th>Status</th>    
    </tr>   
    @foreach($applications as $application)
    <tr>
      <td>{{$application->username}}</td>
      <td>{{$application->created_at}}</td>
      <td>{{$application->appstatus}}</td>
    </tr>
   @endforeach
  </table>
</div>