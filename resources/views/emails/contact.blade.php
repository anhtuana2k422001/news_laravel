@component('mail::message')
#Tin nhắn khách hàng

Khách hàng đã gửi một tin nhắn liên hệ mới 
<br><br>
Họ: {{ $firstname }}
<br>
Tên: {{ $secondname }}
<br>
Email: {{ $email }}
<br>
Tiêu đề: {{ $subject }}
<br>
Nội dung liên hệ: {{ $message }}

@component('mail::button', ['url' => ''])
Xem tin nhắn
@endcomponent

Cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
