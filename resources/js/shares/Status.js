
import { Badge } from 'primereact/badge';
import { useEffect } from 'react';
import { statusOptions } from '../helpers/utilities';

export const Status = ({status}) => {

    const [show, setShow] = useEffect(null);

    useEffect(() => {
        if(status) {
           const showable = statusOptions.filter(e => e.value === status)[0];
           setShow(showable);
        }
    },[status]);

    return(
        <Badge 
            value={show.label} 
            severity={show.severity}
        />
    )
}