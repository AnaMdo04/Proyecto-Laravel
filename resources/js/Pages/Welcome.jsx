import { Link, Head } from "@inertiajs/react";
import logo from "./logo.png";
import fondo from "./fondo.png";
import juego1 from "./juego1.png";
import juego2 from "./juego2.png";
import juego3 from "./juego3.png";
import juego4 from "./juego4.png";

export default function Welcome({ auth }) {
    // Arreglo de juegos para iterar
    const juegos = [
        {
            img: juego1,
            nombre: "Juego 1",
            descripcion: "Descripción del Juego 1",
        },
        {
            img: juego2,
            nombre: "Juego 2",
            descripcion: "Descripción del Juego 2",
        },
        {
            img: juego3,
            nombre: "Juego 3",
            descripcion: "Descripción del Juego 3",
        },
        {
            img: juego4,
            nombre: "Juego 4",
            descripcion: "Descripción del Juego 4",
        },
    ];

    return (
        <>
            <Head title="Tienda de Juegos de Mesa" />
            <div
                className="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-cover bg-no-repeat selection:bg-red-500 selection:text-white"
                style={{ backgroundImage: `url(${fondo})` }}
            >
                <div className="absolute top-0 left-0 right-0 bottom-0 bg-black bg-opacity-50 z-10"></div>

                <div className="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-20">
                    {auth.user ? (
                        <div
                            style={{
                                backgroundColor: "rgba(0,0,0,0.6)",
                                padding: "8px",
                                borderRadius: "10px",
                            }}
                        >
                            <Link
                                href={route("dashboard")}
                                className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >
                                Cuenta de Usuario
                            </Link>
                        </div>
                    ) : (
                        <>
                            <div
                                style={{
                                    backgroundColor: "rgba(0,0,0,0.6)",
                                    padding: "8px",
                                    borderRadius: "10px",
                                    display: "inline-block",
                                    marginRight: "4px",
                                }}
                            >
                                <Link
                                    href={route("login")}
                                    className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >
                                    Iniciar Sesión
                                </Link>
                            </div>
                            <div
                                style={{
                                    backgroundColor: "rgba(0,0,0,0.6)",
                                    padding: "8px",
                                    borderRadius: "10px",
                                    display: "inline-block",
                                }}
                            >
                                <Link
                                    href={route("register")}
                                    className="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >
                                    Registrarse
                                </Link>
                            </div>
                        </>
                    )}
                </div>

                <div className="max-w-7xl mx-auto p-6 lg:p-8 z-20">
                    <div className="flex justify-center">
                        <div
                            style={{
                                backgroundColor: "rgba(0,0,0,0.6)", // Fondo oscuro semitransparente
                                borderRadius: "50%", // Hace el contenedor circular
                                display: "flex",
                                alignItems: "center",
                                justifyContent: "center",
                                width: "80px", // Ajusta el tamaño según necesites
                                height: "80px", // Ajusta el tamaño según necesites
                                zIndex: 20, // Asegura que el logo esté sobre la superposición
                            }}
                        >
                            <img
                                src={logo}
                                alt="Logo de la tienda de juegos de mesa"
                                style={{ width: "70%", height: "auto" }} // Ajusta el tamaño del logo según necesites
                            />
                        </div>
                    </div>
                    <div className="mt-16">
                        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                            {juegos.map((juego, index) => (
                                <div
                                    key={index}
                                    className="scale-100 p-6 bg-white bg-opacity-95 dark:bg-gray-800 dark:bg-opacity-95 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col items-center motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                                >
                                    <img
                                        src={juego.img}
                                        alt={juego.nombre}
                                        className="h-40 w-40 object-cover rounded-md"
                                    />
                                    <h2 className="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                        {juego.nombre}
                                    </h2>
                                    <p className="mt-4 text-gray-500 dark:text-gray-400 text-sm text-center leading-relaxed">
                                        {juego.descripcion}
                                    </p>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
                <div className="absolute bottom-0 right-0 p-6 text-sm text-gray-500 dark:text-gray-400 z-20">
                    © 2024 Ana Montes de Ory.
                </div>
            </div>
        </>
    );
}
