import { useEffect } from "react";
import Checkbox from "@/Components/Checkbox";
import GuestLayout from "@/Layouts/GuestLayout";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import TextInput from "@/Components/TextInput";
import { Head, Link, useForm } from "@inertiajs/react";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
    });

    useEffect(() => {
        return () => {
            reset("password");
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route("login"));
    };

    return (
        <GuestLayout>
            <Head title="Log in" />
            <div style={{ height: "80vh", width: "100%" }} className="flex">
                {/* Left Section */}
                <div className="w-full md:w-1/2 bg-white flex items-center justify-center p-10">
                    <div className="max-w-md w-full space-y-8">
                        <div>
                            <h2 className="text-center text-3xl font-bold text-gray-900">
                                Selamat datang di Go-Lacak
                            </h2>
                            <p className="text-center text-sm text-gray-600">
                                Silahkan masuk ke Go-Lacak
                            </p>
                        </div>
                        {status && (
                            <div className="mb-4 font-medium text-sm text-green-600">
                                {status}
                            </div>
                        )}
                        <form onSubmit={submit} className="space-y-6">
                            <div>
                                <InputLabel
                                    htmlFor="email"
                                    value="Alamat Email"
                                />
                                <TextInput
                                    id="email"
                                    type="email"
                                    name="email"
                                    value={data.email}
                                    className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    autoComplete="username"
                                    isFocused={true}
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
                                />
                                <TextInput
                                    id="password"
                                    type="password"
                                    name="password"
                                    value={data.password}
                                    className="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    autoComplete="current-password"
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
                                <PrimaryButton
                                    className="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    disabled={processing}
                                >
                                    Masuk
                                </PrimaryButton>
                            </div>
                            {
                                <div className="flex items-center justify-between">
                                    {canResetPassword && (
                                        <Link
                                            href={route("register")}
                                            className="underline text-sm text-gray-600 hover:text-gray-900"
                                        >
                                            Belum punya akun ?
                                        </Link>
                                    )}
                                </div>
                            }
                        </form>
                    </div>
                </div>
                {/* Right Section */}
                <div
                    className="hidden md:flex w-1/2 bg-gradient-to-br from-blue-500 to-purple-600 items-center justify-center"
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
