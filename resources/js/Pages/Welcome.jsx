import { Link, Head } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Welcome" />
            <div className="min-h-screen flex flex-col sm:flex-row items-start justify-between bg-gray-900 text-white">
                {/* Left Section */}
                <div className="flex flex-col justify-start items-start w-full sm:w-1/2 pt-[23vh] pb-[10vh] px-4 sm:px-8 lg:px-12">
                    <h1 className="text-5xl font-bold mb-4">
                        Dinas Tenaga Kerja Kota Semarang
                    </h1>
                    <div className="mb-4">
                        <img
                            src="/disnaker.ico"
                            alt="Logo"
                            className="w-auto h-32 mb-2"
                        />
                    </div>
                    <h1 className="text-3xl font-bold mb-4">Go-Lacak</h1>
                    <p className="text-lg mb-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Pariatur aspernatur, est saepe natus aliquam rerum
                        iure accusantium, cum error, dolorem quam nesciunt
                        suscipit itaque atque quo! Itaque fuga natus delectus.
                        <br />
                        Golacak- golacak
                    </p>
                    <div className="flex space-x-4">
                        <Link
                            href={route("login")}
                            className="bg-orange-500 text-white py-2 px-6 rounded-full font-semibold hover:bg-orange-600 transition"
                        >
                            Masuk
                        </Link>
                        <Link
                            href={route("register")}
                            className="bg-transparent border-2 border-white text-white py-2 px-6 rounded-full font-semibold hover:bg-white hover:text-gray-900 transition"
                        >
                            Daftar
                        </Link>
                    </div>
                </div>

                {/* Right Section */}
                <div className="w-full sm:w-1/2 h-full">
                    <img
                        src="/semarang.jpg" // Replace with your actual image path
                        alt="People working"
                        className="w-full h-full object-cover"
                    />
                </div>
            </div>
        </>
    );
}
