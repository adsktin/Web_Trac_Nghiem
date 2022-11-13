<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake  = Factory::create();
        $limit = 4;
        $list_image = ['1668068055.jpg', '1668068062.png', '1668068070.jpg', '1668068079.jpg'];
        $list_title = ['iPhone 14 Pro', 'Liên Minh Huyền Thoại', 'Iphone Gập', 'Cảnh Đẹp'];
        $list_decription = ['Sở hữu iPhone 14 Pro bạn sẽ có không gian giải trí hoàn hảo cùng màn hình sắc nét kích thước 6.1 inch độ phân giải 2556 x 1179 Pixels cùng tấm OLED sống động đến từng chi tiết. Đặc biệt, trên chiếc điện thoại này bạn sẽ không còn thấy màn hình tai thỏ quen thuộc thay vào đó là kiểu viên thuốc mới làm tăng không gian hiển thị, mang đến nhiều trải nghiệm thú vị hơn. Năm nay, iPhone đã nâng cấp độ phân giải camera chính trên điện thoại này lên thành 48 MP, cho phép bạn chụp được những bức ảnh với độ sắc nét hoàn hảo, cùng khả năng quay video 4K rõ ràng đến từng chi tiết. Mặt khác, bộ vi xử lý A16 Bionic mới được cải tiến cả về CPU và GPU giúp hiệu suất đồ họa nhanh hơn đáng kể. Giá iPhone 14 Pro quá là rẻ luôn rồi, bạn nên mua ngay đi nhé! Còn rất nhiều deal hot chờ bạn ghé qua, bằng cách click vào nút cam bên dưới để xem thêm ngay bạn nhé!', 'Sau 10 năm được phát hành bởi Garena, Liên Minh Huyền Thoại chính thức được phía nhà phát triển Riot tiếp quản. Theo đó, tựa game Liên Minh Huyền Thoại và chế độ Đấu Trường Chân Lý (TFT) sẽ được Riot Games phát hành tại khu vực Đông Nam Á, Đài Loan (Trung Quốc) từ tháng 1/2023. Tính thêm cả 3 trò chơi bao gồm: VALORANT, Liên Minh Huyền Thoại: Tốc Chiến và Huyền Thoại Runeterra, tổng số lượng các tựa game mà Riot Games tự phát hành trong khu vực giờ đây sẽ được nâng lên 5. Riot Games tự phát hành game trên khắp Đông Nam Á. Trong khi đó, Taiwan Mobile và VNGGames đã được Riot chỉ định trở thành những nhà phát hành mới cho hai tựa game LMHT và chế độ ĐTCL lần lượt tại Đài Loan và Việt Nam.', 'Hôm 7/11, một kênh YouTube Trung Quốc có tên Scientific and Technological Aesthetics đã đăng tải video quay lại quá trình “phù phép” một chiếc iPhone bình thường trở thành điện thoại màn hình gập. Nhóm kỹ sư này dự định chế một chiếc iPhone gập và muốn giữ lại càng nhiều linh kiện gốc càng tốt. Nhưng vấn đề đặt ra là các thành phần của chiếc smartphone này phải đủ độ mềm dẻo để có thể gập lại mà màn hình cảm ứng vẫn hoạt động tốt, Apple Insider cho biết. Trong đoạn video, các kỹ sư đã gỡ hàng chục tấm màn của iPhone, sau đó cắt phần viền của một thiết bị gập khác và ghép nối sao cho chúng có thể gập trơn tru. Ban đầu, anh định sử dụng phần bản lề của Galaxy Z Flip nhưng cuối cùng đã chọn Motorola Razr vì có phần gập ở giữa nhỏ hơn. Về tấm màn, sau khi thử nghiệm hàng chục màn hình khác nhau, kỹ sư Trung Quốc đã dùng màn hình OLED trên iPhone X để đảm bảo chất lượng hiển thị và màu sắc. Thậm chí, anh còn sử dụng công nghệ in 3D đối với một số bộ phận giúp chiếc iPhone có thể gập bình thường.', 'Phong cảnh đẹp tại một bờ hồ được một người chụp lại.'];
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'image' => $list_image[$i],
                'title' => $list_title[$i],
                'decription' => $list_decription[$i],
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
    }
}