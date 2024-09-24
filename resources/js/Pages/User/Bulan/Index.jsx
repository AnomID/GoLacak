import React from "react";
import { Link } from "@inertiajs/inertia-react";

const UserBulanIndex = ({ bulan }) => {
    return (
        <div>
            <h1>Bulan</h1>

            <table>
                <thead>
                    <tr>
                        <th>Bulan</th>
                    </tr>
                </thead>
                <tbody>
                    {bulan.map((item) => (
                        <tr key={item.id}>
                            <td>
                                <Link
                                    href={route("user.program.index", item.id)}
                                >
                                    {item.bulan}
                                </Link>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
};

export default UserBulanIndex;
