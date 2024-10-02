import { Link, Head } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Welcome" />
            <div className="min-h-screen flex flex-col-reverse sm:flex-row items-start justify-between bg-gray-900 text-white">
                {/* Left Section */}
                <div className="flex flex-col justify-center items-start w-full sm:w-1/2 pt-12 sm:pt-[23vh] pb-10 px-4 sm:px-8 lg:px-12">
                    <h1 className="text-4xl sm:text-5xl font-bold mb-4 text-center sm:text-left">
                        Dinas Tenaga Kerja Kota Semarang
                    </h1>
                    <div className="flex justify-center sm:justify-start mb-4">
                        <img
                            src="/disnaker.ico"
                            alt="Logo"
                            className="w-24 h-24 sm:w-auto sm:h-32 mb-2"
                        />
                    </div>
                    <h1 className="text-2xl sm:text-3xl font-bold mb-4 text-center sm:text-left">
                        Go-Lacak
                    </h1>
                    <p className="text-base sm:text-lg mb-4 text-center sm:text-left">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Pariatur aspernatur, est saepe natus aliquam rerum
                        iure accusantium, cum error, dolorem quam nesciunt
                        suscipit itaque atque quo! Itaque fuga natus delectus.
                        <br />
                        Golacak- golacak
                    </p>
                    <div className="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 items-center sm:items-start">
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
                <div className="w-full sm:w-1/2 h-64 sm:h-auto">
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
