<div class="card mb-3">


  <div class="card-body">


    <table class="table table-light table-striped table-hover">

      <tbody>
        @foreach($clients as $client)
        <tr>
          <td>{{ $client->companyName }}</td>
          <td>{{ $client->firstName }}</td>
          <td>{{ $client->lastName }}</td>
          <td class="d-none d-md-table-cell">{{ $client->phoneNumber }}</td>
          <td class="d-none d-md-table-cell">{{ $client->address }}</td>
          <td>

            <a href="{{ url('/edit/'.$client->id) }}" class="btn bn-sm btn-success"><i class="fa-solid fa-pencil fa-fw"></i></a>
            <form action="{{ url('/destroy/'.$client->id) }}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn bn-sm btn-secondary"><i class="fa-solid fa-trash fa-fw"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>