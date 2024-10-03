import { useEffect } from "react";
import GuestLayout from "@/Layouts/GuestLayout";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
    });

    useEffect(() => {
        return () => {
            reset("password", "password_confirmation");
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route("register"));
    };

    return (
        <GuestLayout>
            <Head title="Register" />
            <div className="flex flex-col md:flex-row w-full min-h-[80vh]">
                {/* Left Section */}
                <div className="w-full md:w-1/2 bg-white flex items-center justify-center p-6 sm:p-10 relative">
                    {/* Back Button */}
                    <Link
                        href={route("welcome")}
                        className="text-sm text-[#B8001F] hover:text-[#507687] font-semibold absolute top-4 left-4 transition-colors duration-200 ease-in-out hover:underline"
                    >
                        &larr; Back
                    </Link>
                    <div className="max-w-md w-full space-y-8 mt-12">
                        <div>
                            <h2 className="text-center text-3xl font-bold text-[#384B70]">
                                Buat Akun Go-Lacak
                            </h2>
                            <p className="text-center text-sm text-[#507687]">
                                Buat akun untuk mengakses Go-Lacak
                            </p>
                        </div>
                        <form onSubmit={submit} className="space-y-6">
                            <div>
                                <InputLabel
                                    htmlFor="name"
                                    value="Nama"
                                    className="text-[#507687]"
                                />
                                <TextInput
                                    id="name"
                                    name="name"
                                    value={data.name}
                                    className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#B8001F] focus:border-[#B8001F] sm:text-sm"
                                    autoComplete="name"
                                    isFocused={true}
                                    onChange={(e) =>
                                        setData("name", e.target.value)
                                    }
                                />
                                <InputError
                                    message={errors.name}
                                    className="mt-2"
                                />
                            </div>
                            <div>
                                <InputLabel
                                    htmlFor="email"
                                    value="Alamat Email"
                                    className="text-[#507687]"
                                />
                                <TextInput
                                    id="email"
                                    type="email"
                                    name="email"
                                    value={data.email}
                                    className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#B8001F] focus:border-[#B8001F] sm:text-sm"
                                    autoComplete="username"
                                    onChange={(e) =>
                                        setData("email", e.target.value)
                                    }
                                />
                                <InputError
                                    message={errors.email}
                                    className="mt-2"
                                />
                            </div>
                            <div>
                                <InputLabel
                                    htmlFor="password"
                                    value="Kata Sandi"
                                    className="text-[#507687]"
                                />
                                <TextInput
                                    id="password"
                                    type="password"
                                    name="password"
                                    value={data.password}
                                    className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#B8001F] focus:border-[#B8001F] sm:text-sm"
                                    autoComplete="new-password"
                                    onChange={(e) =>
                                        setData("password", e.target.value)
                                    }
                                />
                                <InputError
                                    message={errors.password}
                                    className="mt-2"
                                />
                            </div>
                            <div>
                                <InputLabel
                                    htmlFor="password_confirmation"
                                    value="Ketik Ulang Kata Sandi"
                                    className="text-[#507687]"
                                />
                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    value={data.password_confirmation}
                                    className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-[#B8001F] focus:border-[#B8001F] sm:text-sm"
                                    autoComplete="new-password"
                                    onChange={(e) =>
                                        setData(
                                            "password_confirmation",
                                            e.target.value
                                        )
                                    }
                                />
                                <InputError
                                    message={errors.password_confirmation}
                                    className="mt-2"
                                />
                            </div>
                            <div className="flex items-center justify-between">
                                <Link
                                    href={route("login")}
                                    className="underline text-sm text-[#507687] hover:text-[#384B70]"
                                >
                                    Sudah terdaftar?
                                </Link>
                            </div>
                            <div>
                                <PrimaryButton
                                    className="w-full py-3 px-6 flex justify-center items-center border border-transparent text-sm font-medium rounded-full text-white bg-[#B8001F] hover:bg-[#507687] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#B8001F] shadow-lg transition-all duration-200 ease-in-out transform hover:scale-105"
                                    disabled={processing}
                                >
                                    Daftar
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
                {/* Right Section */}
                <div
                    className="hidden md:flex w-full md:w-1/2 bg-gradient-to-br from-[#507687] to-[#384B70] items-center justify-center"
                    style={{
                        backgroundImage: "url('semarang.jpg')",
                        backgroundSize: "cover",
                        backgroundPosition: "center",
                    }}
                ></div>
            </div>
        </GuestLayout>
    );
}
