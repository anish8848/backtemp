<tr>
    <td>{{++$key}}</td>
    <td>{{$page->title}}</td>
    <td>{{$page->name}}</td>
    <td>{{$page->content}}</td>
<td class="text-right">
 <a href="{{route('page.edit', $page->slug)}}" class="btn btn-flat btn-primary btn-xs">
     Edit
 </a>

 <button type="button" data-url="{{ route('page.destroy', $page->id) }}"
          class="btn btn-flat btn-primary btn-xs item-delete">
      Delete
  </button>

</td>
</tr>
