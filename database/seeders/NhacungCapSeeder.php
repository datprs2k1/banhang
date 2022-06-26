<?php

namespace Database\Seeders;

use App\Models\NhaCungCap;
use Illuminate\Database\Seeder;

class NhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'ten_nha_cung_cap' => 'Công Ty Thực Phẩm Hà Nội',
                'logo' => '1655655101_logo.png',
                'gioi_thieu' => 'Công ty CP Thực phẩm Hà Nội là một trong những thương hiệu thuộc tập đoàn Hapro – đơn vị tiên phong trong lĩnh vực hàng nông sản thực phẩm tại Việt Nam. Công ty đã đầu tư xây dựng các cơ sở vệ tinh, các vùng nguyên liệu, hoặc đặt hàng các trang trại chăn nuôi. Từ đó đảm bảo cung cấp được nguồn nông sản, thực phẩm tươi, an toàn đến khách hàng Hà Nội và các địa phương lân cận. Một số sản phẩm, thực phẩm chế biến có chất lượng cao, đảm bảo VSATTP, mang đậm hương vị truyền thống do Công ty CP Thực phẩm Hà Nội như: Giò lụa, giò bò, giò xào; Dấm gạo, dấm nếp cẩm; Nem thịt và Bánh bao ngon các loại,…',
                'dia_chi' => '24-26 Trần Nhật Duật, Đồng Xuân, Hoàn Kiếm, Hà Nội',
                'phone' => '0438253825',
                'email' => 'thucphamhanoi@haprogroup.vn',
                'website' => 'http://www.thucphamhanoi.com.vn/vi/trang-chu/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_nha_cung_cap' => 'Công Ty Thực Phẩm Hoàng Đông',
                'logo' => '1655655232_1459994667-Thuc-pham-Hoang-Dong.jpg',
                'gioi_thieu' => 'Công ty TNHH thực phẩm Hoàng Đông là một trong những nhà sản xuất và phân phối thực phẩm sạch hàng đầu tại Hà Nội. Với danh mục sản phẩm đa dạng, phong phú, có chất lượng cao và tinh thần phục vụ tốt nhất, công ty TNHH thực phẩm Hoàng Đông đã xây dựng một hệ thống cung cấp sản phẩm đến tận tay khách hàng qua các dịch vụ ở trường học, nhà hàng, công ty, các bếp ăn tập thể,…',
                'dia_chi' => 'Phòng 201, Nhà C6 Mai Động, Quận Hoàng Mai, Hà Nội',
                'phone' => '0242217166',
                'email' => 'ngochuyhd@gmail.com',
                'website' => 'http://thucphamhoangdong.com.vn',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_nha_cung_cap' => 'Công Ty Exp Việt Nam',
                'logo' => '1655655475_z2064310370592_890939df82edaa8792c3dc4bf0393791.jpg',
                'gioi_thieu' => 'Công ty CP Đầu tư Exp Việt Nam là một trong những địa chỉ các công ty thực phẩm uy tín tại Hà Nội. Công ty có nguồn lực vật chất lớn do có sự hợp tác với các đơn vị sản xuất nguyên liệu nông lâm thuỷ sản. Các sản phẩm của công ty đa dạng như rau củ quả, gạo, đồ uống, hải sản,… Không chỉ được đón nhận tại thị trường Hà Nội mà công ty còn được bao phủ hầu hết các tỉnh thành trên cả nước. Hơn nữa, Exp Việt Nam đã mở rộng thị trường dịch vụ nhằm giúp công ty tồn tại và phát triển hơn, mang lại phục vụ tốt nhất cho khách hàng.',
                'dia_chi' => 'Phòng 302 tòa nhà Thông Tấn, Xuân Phương, quận, Nam Từ Liêm, Hà Nội',
                'phone' => '0966484808',
                'email' => 'thucphansachexpvn@gmail.com',
                'website' => 'http://expvietnam.com/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_nha_cung_cap' => 'Công Ty Hanoifood',
                'logo' => '1655655337_logo-hanoi-food-new-1411.png',
                'gioi_thieu' => 'Công ty Hanoifood là thành viên của Tổng công ty Lương thực Miền Bắc – Vinafood. Với kinh nghiệm và uy tín đã được xác lập trong nhiều năm hợp tác, liên doanh với các công ty trong nước và nước ngoài, Hanoifood luôn là địa điểm tin cậy và rộng mở chào đón các nhà đầu tư, kinh doanh cùng tham gia hợp tác. Bằng việc sử dụng các dây chuyền thiết bị và công nghệ hiện đại nhập khẩu từ Nhật Bản, Italia, Vương quốc Anh, Mỹ… Kết hợp với kinh nghiệm hơn 40 năm chế biến thực phẩm. Các sản phẩm của Hanoifood đã và đang được tiêu thụ trên khắp thị trường Việt Nam và đang được xuất khẩu sang các nước châu Âu; châu Phi….',
                'dia_chi' => '67A Trương Định, Quận Hai Bà Trưng, Hà Nội',
                'phone' => '0243863015',
                'email' => 'hanoifood@hanoifood.com.vn',
                'website' => 'http://www.foodhanoi.com.vn/',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_nha_cung_cap' => 'Công Ty FamFood',
                'logo' => '1655655653_logo_famfood.png',
                'gioi_thieu' => 'Famfood là nhà phân phối thực phẩm sạch nhập khẩu chính ngạch hàng uy tín hàng đầu tại Hà Nội. Đây là đối tác nhập khẩu của nhiều hãng thực phẩm lớn đến từ Úc, Mỹ, Canada, Đan Mạch, Nga, Brazil, Hàn Quốc,…  Với gần 2 năm hoạt động, Famfood đã trở thành đối tác uy tín chuyên phân phối thực phẩm nhập khẩu và đông lạnh tại Việt nam.',
                'dia_chi' => 'TT10 – 39, KĐT Mới Văn Phú, P. Phú La, Q. Hà Đông, Hà Nội',
                'phone' => '0327003003',
                'email' => 'famfoodco@gmail.com',
                'website' => 'http://www.famfood.com.vn/',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        NhaCungCap::insert($data);
    }
}
