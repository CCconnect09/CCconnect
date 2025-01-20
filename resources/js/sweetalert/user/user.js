import { handleClick } from "../../sweetalert";

// ---------------------------------
// User
document.documentElement.addEventListener("click", function (event) {
    const unique = event.target.dataset.unique ?? "";

    // Destroy
    if (event.target && event.target.matches("[data-confirm-user-destroy]"))
        handleClick({
            data: { unique },
            event: {
                noun: "account",
                verb: "deactivate",
                method: "DELETE",
            },
            uri: {
                url: `/dashboard/users`,
            },
            redirect: "/dashboard/users",
        });

    // Destroy (profile picture)
    if (
        event.target &&
        event.target.matches("[data-confirm-user-profile-picture-destroy]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "profile picture",
                verb: "delete",
                method: "DELETE",
            },
            uri: {
                url: `/dashboard/users/account/settings`,
                noun: `profile-picture`,
            },
            redirect: "/dashboard",
        });

    // Activate
    if (event.target && event.target.matches("[data-confirm-user-activate]"))
        handleClick({
            data: { unique },
            event: {
                noun: "account",
                verb: "activate",
                method: "PUT",
            },
            uri: {
                url: `/dashboard/users`,
                noun: `activate`,
            },
            redirect: "/dashboard/users",
        });

    // Non-active your account
    if (
        event.target &&
        event.target.matches("[data-confirm-user-non-active-your-account]")
    )
        handleClick({
            data: { unique },
            event: {
                noun: "your account",
                verb: "deactivate",
                method: "DELETE",
            },
            uri: {
                url: `/dashboard/users/account`,
                noun: `non-active-your-account`,
            },
            redirect: "/",
        });
});
