@props(['url'])
<tr>
  <td class="header">
    <a href="{{ $url }}" style="display: inline-block;">
      @if (trim($slot) === 'Laravel')
      <img src="{{url('Frontend/img/simasterLogo.png')}}" class="logo" alt="Simaster Logo">
      @else
      {{ $slot }}
      @endif
    </a>
  </td>
</tr>