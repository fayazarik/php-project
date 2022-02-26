const name= document.getElementById('name')
const address= document.getElementById('address')
const phone= document.getElementById('phone')
const password= document.getElementById('password')
const form= document.getElementById('form')
const errorElement= document.getElementById('error')

form.addEventListener('submit', (e) =>
{
    let messages= []
    if (name.value ==''|| name.value==null)
    {
        messages.push('Name is required')
    }
    elseif (address.value ==''|| address.value==null)
    {
        messages.push('Address is required')
    }
    elseif (phone.value ==''|| phone.value==null)
    {
        messages.push('Phone number is required')
    }

    if(password.value.length>=20)
    {
        messages.push('Password must be less than 20 characters.')
    }
    if(messages.length>0)
    {
        e.preventDefault()
        errorElement.innerText= messages.join(', ')
    }
})