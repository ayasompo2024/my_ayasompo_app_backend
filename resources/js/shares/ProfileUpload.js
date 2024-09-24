import { Image } from "primereact/image";
import { baseURL, endpoints } from "../constants";
import { useCallback, useEffect, useState } from "react";

export const ProfileUpload = ({ preview, onSelect }) => {

    const [src, setSrc] = useState(preview);
    const [payload, setPayload] = useState(null);

    const mounted = useCallback(() => {
        if (preview) {
            setSrc(`${baseURL}${preview}`);
        }
    }, [preview]);

    const selectedFile = (e) => {
        setPayload(e.target.files[0]);
        onSelect(e.target.files[0]);
    }

    useEffect(() => {
        mounted();
    }, [mounted]);

    useEffect(() => {
        if (payload) {
            const objectUrl = URL.createObjectURL(payload);
            setSrc(objectUrl);
        }
    }, [payload]);

    return (
        <div className="w-full d-flex flex-column justify-content-center align-items-center">
            <div style={{
                width: "150px",
                height: "150px",
                borderRadius: "50%",
                display: "flex",
                flexDirection: "column",
                alignItems: "center",
                justifyContent: "center",
                marginBottom: "20px",
                cursor: "pointer"
            }}>
                <Image
                    width="150px"
                    height="150px"
                    style={{borderRadius: "50%"}}
                    src={src ? src : endpoints.defaultImagePath}
                    onClick={() => document.getElementById("profile").click()}
                />
            </div>

            <input
                id="profile"
                type="file"
                accept="image/*"
                className="hidden"
                onChange={(e) => selectedFile(e)}
            />
        </div>
    )
}