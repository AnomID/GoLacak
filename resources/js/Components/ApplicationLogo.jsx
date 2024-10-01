export default function ApplicationLogo(props) {
    return (
        <img
            {...props}
            src="/disnaker.ico" // Ubah path ini sesuai lokasi logo di dalam proyek Anda
            alt="Logo Dinas Tenaga Kerja Kota Semarang"
            className="h-20 w-auto" // Sesuaikan ukuran logo dengan kebutuhan
        />
    );
}
